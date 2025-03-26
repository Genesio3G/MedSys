import { Component } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { ModalmedicamentosComponent } from '../modalmedicamentos/modalmedicamentos.component';
import { LoginComponent } from '../login/login.component';

@Component({
  selector: 'app-header',
  standalone: false,
  templateUrl: './header.component.html',
  styleUrl: './header.component.css'
})
export class HeaderComponent {
  constructor(public dialog: MatDialog) {}

   // Função para abrir o modal 
   openLoginModal(): void {
    this.dialog.open(ModalmedicamentosComponent, {
      width: '400px'
    });
  }

  openModal(): void {
    this.dialog.open(LoginComponent, {
      width: '400px'
    });
  }
}
