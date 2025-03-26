import { Component } from '@angular/core';
import { MatDialogRef , MatDialog } from '@angular/material/dialog';
// import { RegisterComponentComponent } from '../../components/register-component/register-component.component';


@Component({
  selector: 'app-login',
  standalone: false,
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  showPassword: boolean = false; // Controla a visibilidade da senha
  email: string = '';
  password: string = '';

  constructor(
    // public dialogRef: MatDialogRef<RegisterComponentComponent>,
    private dialog: MatDialog // Injete o MatDialog para abrir o modal de registro
  ) {}
// Função para fechar o modal
// closeModal(): void {
//   this.dialogRef.close();
// }
onRegister(): void{

}


// Função para alternar a visibilidade da senha
togglePasswordVisibility(): void {
  this.showPassword = !this.showPassword;
}

// Função para abrir o modal de registro
// openRegisterModal(event: Event): void {
//   event.preventDefault(); // Evita o comportamento padrão do link
//   this.closeModal(); // Fecha o modal de login
//   this.dialog.open(RegisterComponentComponent, {
//     width: '400px'
//   });
// }

// Função para enviar o formulário de login
onSubmit(): void {
  // Lógica de login
  console.log('Email:', this.email);
  console.log('Senha:', this.password);
}
}
