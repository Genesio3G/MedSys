import { Component } from '@angular/core';

@Component({
  selector: 'app-carrinho-convidado',
  standalone: false,
  templateUrl: './carrinho-convidado.component.html',
  styleUrl: './carrinho-convidado.component.css'
})
export class CarrinhoConvidadoComponent {
  produtos = [
    { id: 1, nome: 'Medicamento A', descricao: 'Fortalece imunidade.', preco: 25.00, imagem: 'assets/images/medicamento-a.jpg', localizacao:'prenda' },
    { id: 2, nome: 'Medicamento B', descricao: 'Alivia dores.', preco: 15.00, imagem: 'assets/images/medicamento-c.jpg', localizacao:'prenda' },
    { id: 3, nome: 'Medicamento C', descricao: 'Melhora a digestão.', preco: 30.00, imagem: 'assets/images/medicamento-c.jpg', localizacao:'prenda' },
    { id: 4, nome: 'Medicamento C', descricao: 'Melhora a digestão.', preco: 30.00, imagem: 'assets/images/medicamento-c.jpg', localizacao:'prenda' },
    
  ];
  produtosFiltrados = [...this.produtos];
  itensCarrinho: any[] = [];
  quantidadeTotal: number = 0;
  termoPesquisa: string = '';

  realizarBusca(): void {
    this.produtosFiltrados = this.produtos.filter(produto =>
      produto.nome.toLowerCase().includes(this.termoPesquisa.toLowerCase())
    );
  }

  adicionarAoCarrinho(produto: any): void {
    const itemExistente = this.itensCarrinho.find(item => item.id === produto.id);
    if (itemExistente) {
      itemExistente.quantidade++;
    } else {
      this.itensCarrinho.push({ ...produto, quantidade: 1 });
    }
    this.atualizarQuantidadeTotal();
  }

  removerItem(id: number): void {
    const itemIndex = this.itensCarrinho.findIndex(item => item.id === id);
    if (itemIndex > -1) {
      this.itensCarrinho[itemIndex].quantidade--;
      if (this.itensCarrinho[itemIndex].quantidade === 0) {
        this.itensCarrinho.splice(itemIndex, 1);
      }
    }
    this.atualizarQuantidadeTotal();
  }

  atualizarQuantidadeTotal(): void {
    this.quantidadeTotal = this.itensCarrinho.reduce((total, item) => total + item.quantidade, 0);
  }

  efetuarCompra(): void {
    console.log('Compra realizada!');
    this.itensCarrinho = [];
    this.atualizarQuantidadeTotal();
  }
}
