import { Component } from '@angular/core';
import { ViewChild, ElementRef, AfterViewInit } from '@angular/core';

@Component({
  selector: 'app-modalmedicamentos',
  standalone: false,
  templateUrl: './modalmedicamentos.component.html', // Caminho relativo ao arquivo .ts
  styleUrls: ['./modalmedicamentos.component.css'],
})
export class ModalmedicamentosComponent implements AfterViewInit {
  @ViewChild('modalBody') modalBody!: ElementRef; // Referência ao corpo da modal
  searchTerm: string = ''; // Termo de pesquisa
  medicamentos = [
    {
      nome: 'Paracetamol',
      descricao: 'Para febre e dores leves.',
      imagem: 'assets/images/paracetamol.jpg',
    },
    {
      nome: 'Ibuprofeno',
      descricao: 'Anti-inflamatório e analgésico.',
      imagem: 'assets/images/ibuprofeno.jpg',
    },
    {
      nome: 'Amoxicilina',
      descricao: 'Antibiótico para infecções bacterianas.',
      imagem: 'assets/images/amoxicilina.jpg',
    },
    {
      nome: 'Dipirona',
      descricao: 'Analgésico e antitérmico.',
      imagem: 'assets/images/dipirona.jpg',
    },
    {
      nome: 'Dipirona',
      descricao: 'Analgésico e antitérmico.',
      imagem: 'assets/images/dipirona.jpg',
    },
    {
      nome: 'Dipirona',
      descricao: 'Analgésico e antitérmico.',
      imagem: 'assets/images/dipirona.jpg',
    },
    {
      nome: 'Dipirona',
      descricao: 'Analgésico e antitérmico.',
      imagem: 'assets/images/dipirona.jpg',
    },
    {
      nome: 'Dipirona',
      descricao: 'Analgésico e antitérmico.',
      imagem: 'assets/images/dipirona.jpg',
    },
  ];

  // Filtra os medicamentos com base no termo de pesquisa
  filterMedicamentos() {
    return this.medicamentos.filter((medicamento) =>
      medicamento.nome.toLowerCase().includes(this.searchTerm.toLowerCase())
    );
  }

  // Ajusta a altura da modal após a visualização ser inicializada
  ngAfterViewInit() {
    this.adjustModalHeight();
  }

  // Calcula e ajusta a altura da modal com base no conteúdo
  adjustModalHeight() {
    const modalBody = this.modalBody.nativeElement;
    const modalContent = modalBody.closest('.modal-content');
    const modalDialog = modalContent.closest('.modal-dialog');

    // Altura do corpo da modal + margens e paddings
    const modalBodyHeight = modalBody.offsetHeight;
    const modalHeaderHeight = modalContent.querySelector('.modal-header').offsetHeight;
    const modalFooterHeight = modalContent.querySelector('.modal-footer').offsetHeight;

    // Altura total da modal
    const totalHeight = modalBodyHeight + modalHeaderHeight + modalFooterHeight + 50; // 50px de margem extra

    // Define a altura máxima da modal
    modalDialog.style.maxHeight = `${Math.min(totalHeight, 90)}vh`; // Limita a 90% da altura da tela
    modalDialog.style.overflowY = 'auto'; // Adiciona rolagem se necessário
  }
}
