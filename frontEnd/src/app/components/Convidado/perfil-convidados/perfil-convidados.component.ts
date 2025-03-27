import { Component } from '@angular/core';

@Component({
  selector: 'app-perfil-convidados',
  standalone: false,
  templateUrl: './perfil-convidados.component.html',
  styleUrl: './perfil-convidados.component.css'
})
export class PerfilConvidadosComponent {
  usuario = {
    nome: 'João da Silva',
    email: 'joao.silva@email.com',
    telefone: '(11) 99999-8888'
  };

  salvarPerfil(): void {
    console.log('Perfil salvo:', this.usuario);
    // Salvar informações do perfil no backend
  }
}
