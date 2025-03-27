import { Component } from '@angular/core';

@Component({
  selector: 'app-historico-convidado',
  standalone: false,
  templateUrl: './historico-convidado.component.html',
  styleUrl: './historico-convidado.component.css'
})
export class HistoricoConvidadoComponent {
  pedidos = [
    {
      data: '2025-03-20',
      medicamento: 'Medicamento A',
      quantidade: 2,
      precoTotal: 50.00,
      status: 'complete'
    },
    {
      data: '2025-03-18',
      medicamento: 'Medicamento B',
      quantidade: 1,
      precoTotal: 15.00,
      status: 'pending'
    },
    {
      data: '2025-03-16',
      medicamento: 'Medicamento C',
      quantidade: 3,
      precoTotal: 90.00,
      status: 'cancelled'
    }
  ];
}
