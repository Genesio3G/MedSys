import { Component } from '@angular/core';

@Component({
  selector: 'app-crud-hospitais',
  standalone: false,
  templateUrl: './crud-hospitais.component.html',
  styleUrl: './crud-hospitais.component.css'
})
export class CrudHospitaisComponent {
  private hospitais = [
    { id: 1, nome: 'Hospital Central', endereco: 'Rua A, Centro', telefone: '111111111' },
    { id: 2, nome: 'Clínica Saúde', endereco: 'Av. B, Bairro Saúde', telefone: '222222222' },
  ];

  // Retorna todos os hospitais
  getHospitais() {
    return this.hospitais;
  }

  // Adiciona um novo hospital
  addHospital(hospital: { id: number; nome: string; endereco: string; telefone: string }) {
    this.hospitais.push(hospital);
  }

  // Atualiza dados do hospital
  updateHospital(id: number, updatedHospital: { nome: string; endereco: string; telefone: string }) {
    const hospital = this.hospitais.find(h => h.id === id);
    if (hospital) {
      hospital.nome = updatedHospital.nome;
      hospital.endereco = updatedHospital.endereco;
      hospital.telefone = updatedHospital.telefone;
    }
  }

  // Remove hospital
  deleteHospital(id: number) {
    this.hospitais = this.hospitais.filter(h => h.id !== id);
  }

}
