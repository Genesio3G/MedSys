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
    { nome: 'Clínica Girasol', endereco: 'Sagrada Esperança', contato: '(+244) 2222-6666', imagem: 'assets/images/clinica0.jpg' },
    { nome: 'Luanda Medical Care', endereco: 'Sagrada Esperança', contato: '(+244) 2222-4444', imagem: 'assets/images/clinica1.jpg' },
    { nome: 'Farmácia Bem-estar', endereco: 'Sagrada Esperança', contato: '(+244) 2222-9999', imagem: 'assets/images/clinica1.jpg' },
    { nome: 'Hospital Esperança', endereco: 'Sagrada Esperança', contato: '(+244) 2222-3333', imagem: 'assets/images/clinica1.jpg' },
    { nome: 'Farmácia Popular', endereco: 'Sagrada Esperança', contato: '(+244) 2222-5555', imagem: 'assets/images/clinica0.jpg' },
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
