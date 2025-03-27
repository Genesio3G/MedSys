import { Component } from '@angular/core';
import { MatDialogRef, MatDialog } from '@angular/material/dialog';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: false,
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
})
export class LoginComponent {
  showPassword: boolean = false; // Controla a visibilidade da senha
  email: string = '';
  password: string = '';
  showModal: boolean = true;

  constructor(
    private router: Router,
    public dialogRef: MatDialogRef<LoginComponent>, // Controla o modal
    private dialog: MatDialog // Opcional para abertura de outros modais
  ) {}

  // Função para fechar o modal
  closeModal(): void {
    this.dialogRef.close();
  }

  // Função para alternar a visibilidade da senha
  togglePasswordVisibility(): void {
    this.showPassword = !this.showPassword;
  }

  // Função para redirecionar para o registro (opcional)
  onRegister(): void {
    console.log('Abrindo página de registro...');
    // Adicione lógica para abrir a página de registro, se necessário
  }

  // Função para enviar o formulário de login
  onSubmit(): void {
    // Lógica de login
    console.log('Email:', this.email);
    console.log('Senha:', this.password);

    // Fecha o modal
    this.closeModal()

    // Redirecionar para a página inicial
    this.router.navigate(['/convidados-home']);
  }
}
