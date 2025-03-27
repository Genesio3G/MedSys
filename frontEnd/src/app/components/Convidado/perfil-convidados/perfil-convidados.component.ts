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
    telefone: '(11) 99999-8888',
    endereco: 'Rua das Palmeiras, 123',
    senha: '',
    foto: 'assets/images/default-profile.jpg'
  };

  salvarPerfil(): void {
    console.log('Perfil salvo:', this.usuario);
    // Adicione lógica para salvar dados no backend
  }

  alterarFoto(event: any): void {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = () => {
        this.usuario.foto = reader.result as string;
        console.log('Foto de perfil atualizada!');
      };
      reader.readAsDataURL(file);
    }
  }
}
