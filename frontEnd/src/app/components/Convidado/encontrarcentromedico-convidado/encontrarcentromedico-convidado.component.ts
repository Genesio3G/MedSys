import { Component } from '@angular/core';

@Component({
  selector: 'app-encontrarcentromedico-convidado',
  standalone: false,
  templateUrl: './encontrarcentromedico-convidado.component.html',
  styleUrl: './encontrarcentromedico-convidado.component.css'
})
export class EncontrarcentromedicoConvidadoComponent {
  termoPesquisa: string = '';
  locais = [
    { nome: 'Clínica Saúde Integral', endereco: 'Rua das Flores, 123', contato: '(11) 1234-5678', imagem: 'assets/images/clinica-saude-integral.jpg' },
    { nome: 'Hospital Vida', endereco: 'Av. Central, 456', contato: '(11) 8765-4321', imagem: 'assets/images/hospital-vida.jpg' },
    { nome: 'Farmácia Bem-estar', endereco: 'Praça Verde, 789', contato: '(11) 5555-9999', imagem: 'assets/images/farmacia-bem-estar.jpg' },
    { nome: 'Hospital Esperança', endereco: 'Rua dos Lírios, 101', contato: '(11) 2222-3333', imagem: 'assets/images/hospital-esperanca.jpg' },
    { nome: 'Farmácia Popular', endereco: 'Av. das Palmeiras, 102', contato: '(11) 4444-5555', imagem: 'assets/images/farmacia-popular.jpg' },
  ];
  locaisFiltrados = [...this.locais];

  procurarLocais(): void {
    this.locaisFiltrados = this.locais.filter(local =>
      local.nome.toLowerCase().includes(this.termoPesquisa.toLowerCase()) ||
      local.endereco.toLowerCase().includes(this.termoPesquisa.toLowerCase())
    );
  }

  procurarFarmacias(): void {
    this.locaisFiltrados = this.locais.filter(local => local.nome.toLowerCase().includes('farmácia'));
    console.log('Filtrando farmácias próximas...');
  }
}
