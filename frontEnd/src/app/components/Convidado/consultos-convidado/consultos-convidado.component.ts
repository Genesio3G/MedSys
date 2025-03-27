import { Component } from '@angular/core';

@Component({
  selector: 'app-consultos-convidado',
  standalone: false,
  templateUrl: './consultos-convidado.component.html',
  styleUrl: './consultos-convidado.component.css'
})
export class ConsultosConvidadoComponent {
  consultas = [
    { data: '2025-03-22', especialidade: 'Clínico Geral', horario: '10:00' },
    { data: '2025-03-20', especialidade: 'Dermatologia', horario: '14:00' },
    { data: '2025-03-18', especialidade: 'Cardiologia', horario: '09:00' },
  ];
  locations = [
    { nome: 'Clínica Saúde Integral', endereco: 'Rua das Flores, 123' },
    { nome: 'Hospital Vida', endereco: 'Av. Central, 456' },
    { nome: 'Clínica Bem-estar', endereco: 'Praça Verde, 789' },
    { nome: 'Hospital Esperança', endereco: 'Rua dos Lírios, 101' },
  ];
  verHistorico(): void {
    console.log('Acessando o histórico de consultas...');
    // Lógica adicional pode ser implementada aqui
  }
}
