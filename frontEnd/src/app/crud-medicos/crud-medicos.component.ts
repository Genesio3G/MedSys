import { Component } from '@angular/core';

@Component({
  selector: 'app-crud-medicos',
  standalone: false,
  templateUrl: './crud-medicos.component.html',
  styleUrl: './crud-medicos.component.css'
})
export class CrudMedicosComponent {
  novoMedico = { id: 0, nome: '', especialidade: '', telefone: '' };
  medicoEditando: any = null;


  cadastrarMedico() {
    
    this.novoMedico = { id: 0, nome: '', especialidade: '', telefone: '' };
  }

  editarMedico(medico: any) {
    this.medicoEditando = { ...medico };
  }

  atualizarMedico() {
    if (this.medicoEditando) {
      this.medicoEditando = null;
    }
  }

  removerMedico(id: number) {
  }

}
