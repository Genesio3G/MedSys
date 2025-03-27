import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { CrudFuncionariosComponent } from './crud-funcionarios/crud-funcionarios.component';
import { CrudMedicosComponent } from './crud-medicos/crud-medicos.component';
import { CrudHospitaisComponent } from './crud-hospitais/crud-hospitais.component';

import { LoginAdministradorComponent } from './components/Administrador/login-administrador/login-administrador.component';
import { AdministradorHomeComponent } from './components/administrador-home/administrador-home.component';
import { AdministradorMedicamentosComponent } from './components/administrador-medicamentos/administrador-medicamentos.component';


import { HomeConvidadoComponent } from './components/Convidado/home-convidado/home-convidado.component';
import { RecomendacoesConvidadoComponent } from './components/Convidado/recomendacoes-convidado/recomendacoes-convidado.component';
import { CarrinhoConvidadoComponent } from './components/Convidado/carrinho-convidado/carrinho-convidado.component';
import { HistoricoConvidadoComponent } from './components/Convidado/historico-convidado/historico-convidado.component';
import { ConsultosConvidadoComponent } from './components/Convidado/consultos-convidado/consultos-convidado.component';
import { EncontrarcentromedicoConvidadoComponent } from './components/Convidado/encontrarcentromedico-convidado/encontrarcentromedico-convidado.component';
import { EncontrarmedicamentosConvidadoComponent } from './components/Convidado/encontrarmedicamentos-convidado/encontrarmedicamentos-convidado.component';
import { PerfilConvidadosComponent } from './components/Convidado/perfil-convidados/perfil-convidados.component';

import { HomeMedicosComponent } from './components/Medicos/home-medicos/home-medicos.component';
import { LoginMedicosComponent } from './components/Medicos/login-medicos/login-medicos.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'Login-Administrador', component: LoginAdministradorComponent, title:'Login | Administrador'},
  { path: 'admin-pagina-inicial', component: AdministradorHomeComponent, title:'Pagina inicial' },
  { path: 'admin-pagina-medicamentos', component: AdministradorMedicamentosComponent, title:'Administrador | Medicamentos' },
  { path: 'admin-pagina-funcionarios', component: CrudFuncionariosComponent, title:'Administrador | Funcionarios' },
  { path: 'admin-pagina-medicos', component: CrudMedicosComponent, title:'Administrador | Medicos' },
  { path: 'admin-pagina-hospitais', component: CrudHospitaisComponent, title:'Administrador | Hospitais'},
  { path: 'convidados-home', component: HomeConvidadoComponent, title:'Convidados | Pagina Inicial'},
  { path: 'convidados-recomendacoes', component: RecomendacoesConvidadoComponent, title:'Convidados | Pagina Inicial'},
  { path: 'convidados-carrinho', component: CarrinhoConvidadoComponent, title:'Convidados | Pagina Inicial'},
  { path: 'convidados-historico', component: HistoricoConvidadoComponent, title:'Convidados | Pagina Inicial'},
  { path: 'convidados-consultas', component: ConsultosConvidadoComponent, title:'Convidados | Pagina Inicial'},
  { path: 'convidados-encontrar-centro-de-saude', component: EncontrarcentromedicoConvidadoComponent, title:'Convidados | Pagina Inicial'},
  { path: 'convidados-encontrar-medicamentos', component: EncontrarmedicamentosConvidadoComponent, title:'Convidados | Pagina Inicial'},
  { path: 'convidados-perfil', component: PerfilConvidadosComponent, title:'Convidados | Pagina Inicial'},
  
  { path: 'medicos-home', component: HomeMedicosComponent, title:'Medicos | Pagina Inicial'},
  { path: 'Login-Medicos', component: LoginMedicosComponent, title:'Login | Medicos'},

  
  // { path: 'convidados-pagina-hospitais', component: CrudHospitaisComponent, title:'Convidados | Pagina Inicial'}

];

@NgModule({
  
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
