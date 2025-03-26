import { Component } from '@angular/core';

@Component({
  selector: 'app-administrador-home',
  standalone: false,
  templateUrl: './administrador-home.component.html',
  styleUrl: './administrador-home.component.css'
})
export class AdministradorHomeComponent {
  usuariosCount = 150;
  hospitaisCount = 10;
  medicosCount = 45;
  medicamentosCount = 300;
  funcionariosCount = 25;

  navigateTo(section: string): void {
    console.log('Navegando para:', section);
    // Aqui você pode adicionar lógica de navegação ou redirecionamento
  }
}
