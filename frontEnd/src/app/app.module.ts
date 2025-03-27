import { NgModule } from '@angular/core';
import { BrowserModule, provideClientHydration, withEventReplay } from '@angular/platform-browser';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http'

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { MedicohospitalComponent } from './components/medicohospital/medicohospital.component';
import { MedicoComponent } from './components/medico/medico.component';
import { MunicipioComponent } from './components/municipio/municipio.component';
import { PaisComponent } from './components/pais/pais.component';
import { ProdutoComponent } from './components/produto/produto.component';
import { ProvinciaComponent } from './components/provincia/provincia.component';
import { ReceitaComponent } from './components/receita/receita.component';
import { ReceitaprodutoComponent } from './components/receitaproduto/receitaproduto.component';
import { SexoComponent } from './components/sexo/sexo.component';
import { StockComponent } from './components/stock/stock.component';
import { StockprodutoComponent } from './components/stockproduto/stockproduto.component';
import { TipocartaocreditoComponent } from './components/tipocartaocredito/tipocartaocredito.component';
import { UnidadehospitalarComponent } from './components/unidadehospitalar/unidadehospitalar.component';
import { FuncionarioComponent } from './components/funcionario/funcionario.component';
import { FarmaciaComponent } from './components/farmacia/farmacia.component';
import { FabricantesComponent } from './components/fabricantes/fabricantes.component';
import { EstadocivilComponent } from './components/estadocivil/estadocivil.component';
import { EspecialidadesmedicasComponent } from './components/especialidadesmedicas/especialidadesmedicas.component';
import { ClientesComponent } from './components/clientes/clientes.component';
import { DadospessoaisComponent } from './components/dadospessoais/dadospessoais.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HomeComponent } from './components/home/home.component';
import { ParceirosComponent } from './components/parceiros/parceiros.component';
import { DepoimentosComponent } from './components/depoimentos/depoimentos.component';
import { ImagemcentralComponent } from './components/imagemcentral/imagemcentral.component';
import { ModalmedicamentosComponent } from './components/modalmedicamentos/modalmedicamentos.component';
import { LoginComponent } from './components/login/login.component';
import { AdministradorHomeComponent } from './components/administrador-home/administrador-home.component';
import { AdministradorMedicamentosComponent } from './components/administrador-medicamentos/administrador-medicamentos.component';
import { CrudFuncionariosComponent } from './crud-funcionarios/crud-funcionarios.component';
import { CrudMedicosComponent } from './crud-medicos/crud-medicos.component';
import { CrudHospitaisComponent } from './crud-hospitais/crud-hospitais.component';
import { FooterConvidadoComponent } from './components/Convidado/footer-convidado/footer-convidado.component';
import { FooterMedicoComponent } from './components/Medicos/footer-medico/footer-medico.component';
import { HeaderMedicoComponent } from './components/Medicos/header-medico/header-medico.component';
import { HeaderConvidadoComponent } from './components/Convidado/header-convidado/header-convidado.component';
import { HomeConvidadoComponent } from './components/Convidado/home-convidado/home-convidado.component';
import { HomeMedicosComponent } from './components/Medicos/home-medicos/home-medicos.component';
import { LoginMedicosComponent } from './components/Medicos/login-medicos/login-medicos.component';
import { LoginAdministradorComponent } from './components/Administrador/login-administrador/login-administrador.component';
import { RecomendacoesConvidadoComponent } from './components/Convidado/recomendacoes-convidado/recomendacoes-convidado.component';
import { CarrinhoConvidadoComponent } from './components/Convidado/carrinho-convidado/carrinho-convidado.component';
import { HistoricoConvidadoComponent } from './components/Convidado/historico-convidado/historico-convidado.component';
import { ConsultosConvidadoComponent } from './components/Convidado/consultos-convidado/consultos-convidado.component';
import { EncontrarmedicamentosConvidadoComponent } from './components/Convidado/encontrarmedicamentos-convidado/encontrarmedicamentos-convidado.component';
import { PerfilConvidadosComponent } from './components/Convidado/perfil-convidados/perfil-convidados.component';
import { EncontrarcentromedicoConvidadoComponent } from './components/Convidado/encontrarcentromedico-convidado/encontrarcentromedico-convidado.component';


@NgModule({
  declarations: [
    AppComponent,
    MedicohospitalComponent,
    MedicoComponent,
    MunicipioComponent,
    PaisComponent,
    ProdutoComponent,
    ProvinciaComponent,
    ReceitaComponent,
    ReceitaprodutoComponent,
    SexoComponent,
    StockComponent,
    StockprodutoComponent,
    TipocartaocreditoComponent,
    UnidadehospitalarComponent,
    FuncionarioComponent,
    FarmaciaComponent,
    FabricantesComponent,
    EstadocivilComponent,
    EspecialidadesmedicasComponent,
    ClientesComponent,
    DadospessoaisComponent,
    HeaderComponent,
    FooterComponent,
    HomeComponent,
    ParceirosComponent,
    DepoimentosComponent,
    ImagemcentralComponent,
    ModalmedicamentosComponent,
    LoginComponent,
    AdministradorHomeComponent,
    AdministradorMedicamentosComponent,
    CrudFuncionariosComponent,
    CrudMedicosComponent,
    CrudHospitaisComponent,
    FooterConvidadoComponent,
    FooterMedicoComponent,
    HeaderMedicoComponent,
    HeaderConvidadoComponent,
    HomeConvidadoComponent,
    HomeMedicosComponent,
    LoginMedicosComponent,
    LoginAdministradorComponent,
    RecomendacoesConvidadoComponent,
    CarrinhoConvidadoComponent,
    HistoricoConvidadoComponent,
    ConsultosConvidadoComponent,
    EncontrarmedicamentosConvidadoComponent,
    PerfilConvidadosComponent,
    EncontrarcentromedicoConvidadoComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FontAwesomeModule,
    FormsModule,
    HttpClientModule, // Importa o módulo HTTP
  ],
  providers: [
    provideClientHydration(withEventReplay())
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
