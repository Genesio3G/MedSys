import { Component } from '@angular/core';

@Component({
  selector: 'app-crud-funcionarios',
  standalone: false,
  templateUrl: './crud-funcionarios.component.html',
  styleUrl: './crud-funcionarios.component.css'
})
export class CrudFuncionariosComponent {
  funcionarios: { 
    nome: string; 
    email: string; 
    cargo: string; 
    departamento: string; 
    telefone: string; 
  }[] = [];

  // Modelo para novos funcionários
  novoFuncionario = { 
    nome: '', 
    email: '', 
    cargo: '', 
    departamento: '', 
    telefone: '' 
  };

  // Método para cadastrar um novo funcionário
  cadastrarFuncionario() {
    if (
      this.novoFuncionario.nome && 
      this.novoFuncionario.email && 
      this.novoFuncionario.cargo && 
      this.novoFuncionario.departamento && 
      this.novoFuncionario.telefone
    ) {
      // Adiciona o novo funcionário ao array
      this.funcionarios.push({ ...this.novoFuncionario });

      // Limpa os campos do formulário
      this.novoFuncionario = { 
        nome: '', 
        email: '', 
        cargo: '', 
        departamento: '', 
        telefone: '' 
      };
    } else {
      alert('Por favor, preencha todos os campos antes de cadastrar!');
    }
  }

  // Método para remover um funcionário
  removerFuncionario(funcionario: { 
    nome: string; 
    email: string; 
    cargo: string; 
    departamento: string; 
    telefone: string; 
  }) {
    this.funcionarios = this.funcionarios.filter(f => f !== funcionario);
  }


}
