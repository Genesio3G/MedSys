import { Component } from '@angular/core';

@Component({
  selector: 'app-encontrarmedicamentos-convidado',
  standalone: false,
  templateUrl: './encontrarmedicamentos-convidado.component.html',
  styleUrl: './encontrarmedicamentos-convidado.component.css'
})
export class EncontrarmedicamentosConvidadoComponent {
  termoPesquisa: string = '';
  medicamentos = [
    { nome: 'Medicamento A', preco: 25.00, farmacia: 'Farmácia Central' },
    { nome: 'Medicamento B', preco: 15.00, farmacia: 'Farmácia Bem-Estar' },
    { nome: 'Medicamento C', preco: 30.00, farmacia: 'Farmácia Popular' },
  ];

  buscarMedicamentos(): void {
    console.log(`Buscando medicamentos relacionados a: ${this.termoPesquisa}`);
    // Lógica de busca adicional pode ser implementada aqui
  }
}
