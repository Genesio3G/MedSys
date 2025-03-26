import { Component, OnInit } from '@angular/core';
import { ProdutoService } from '../../services/produto.service';
import { Produto } from '../../models/produto.model';

@Component({
  selector: 'app-administrador-medicamentos',
  standalone: false,
  templateUrl: './administrador-medicamentos.component.html',
  styleUrl: './administrador-medicamentos.component.css'
})
export class AdministradorMedicamentosComponent implements OnInit  {
  produtos: Produto[] = [];
  produto: Produto = this.novoProduto();
  editMode = false;
  errorMessage: string | null = null;
  mensagemSucesso: string = ''; // Mensagem de sucesso após o registro

  constructor(private produtoService: ProdutoService) {}

  ngOnInit(): void {
    this.carregarProdutos();
  }

  carregarProdutos(): void {
    this.produtoService.obterProdutos().subscribe(
      (data: Produto[]) => {
        this.produtos = data;
      },
      (error) => {
        this.errorMessage = 'Erro ao carregar os produtos.';
        setTimeout(() => (this.errorMessage = null), 5000); // Limpa erro após 5 segundos
      }
    );
  }
  onSubmit(): void {
    const formData = new FormData();
    formData.append('nrRegisto', this.produto.nrRegisto);
    formData.append('nomeProduto', this.produto.nomeProduto);
    formData.append('bp', this.produto.bp);
    formData.append('dataFabrico', this.produto.dataFabrico);
    formData.append('dataValidade', this.produto.dataValidade);
    formData.append('categProduto', this.produto.categProduto);
  
   
    this.produtoService.adicionarProduto(formData).subscribe(
      () => {
        // Exibe o modal de sucesso
        this.showSuccessModal('Produto cadastrado com sucesso!');
        this.resetForm();
        this.carregarProdutos();
      },
      (error) => {
        console.error('Erro ao cadastrar o produto:', error);
        this.errorMessage = 'Erro ao cadastrar o produto. Tente novamente.';
        setTimeout(() => (this.errorMessage = null), 5000);
      }
    );
  }
  
  // Método para exibir o modal
  private showSuccessModal(message: string): void {
    this.mensagemSucesso = message;
  
    // Exibe o modal (pode ser um estilo ou manipulação direta no DOM)
    const modal = document.getElementById('successModal');
    if (modal) {
      modal.style.display = 'block'; // Torna o modal visível
    }
  
    // Fecha automaticamente o modal após 5 minutos (300.000 milissegundos)
    setTimeout(() => {
      this.closeModal();
    }, 5000); // 300000ms = 5 minutos
  }
  
  private closeModal(): void {
    const modal = document.getElementById('successModal');
    if (modal) {
      modal.style.display = 'none'; // Torna o modal invisível
    }
    this.mensagemSucesso = ''; // Limpa a mensagem de sucesso
  }
  
  

private adicionarProduto(formData: FormData): void {
  this.produtoService.adicionarProduto(formData).subscribe(
    () => {
      console.log('Produto cadastrado com sucesso!'); // Log de sucesso
      this.mensagemSucesso = 'Produto cadastrado com sucesso!';
      setTimeout(() => {
        this.resetForm(); // Limpa o formulário
        this.carregarProdutos(); // Recarrega os produtos
      }, 2000);
    },
    (error) => {
      console.error('Erro ao cadastrar o produto:', error); // Log do erro
      this.errorMessage = 'Erro ao cadastrar o produto. Tente novamente.';
      setTimeout(() => (this.errorMessage = null), 5000);
    }
  );
}

private atualizarProduto(formData: FormData): void {
  this.produtoService.atualizarProduto(this.produto.nrRegisto, formData).subscribe(
    () => {
      console.log('Produto atualizado com sucesso!'); // Log de sucesso
      this.mensagemSucesso = 'Produto atualizado com sucesso!';
      setTimeout(() => {
        this.resetForm(); // Limpa o formulário
        this.carregarProdutos(); // Recarrega os produtos
      }, 2000);
    },
    (error) => {
      console.error('Erro ao atualizar o produto:', error); // Log do erro
      this.errorMessage = 'Erro ao atualizar o produto. Tente novamente.';
      setTimeout(() => (this.errorMessage = null), 5000);
    }
  );
}

  

  resetForm(): void {
    this.produto = this.novoProduto();
    this.editMode = false;
    this.errorMessage = null;
  }

  private novoProduto(): Produto {
    return {
      nrRegisto: '',
      nomeProduto: '',
      bp: '',
      dataFabrico: '',
      dataValidade: '',
      categProduto: '',
    };
  }
}
