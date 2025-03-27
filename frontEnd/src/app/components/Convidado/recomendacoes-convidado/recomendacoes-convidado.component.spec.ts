import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RecomendacoesConvidadoComponent } from './recomendacoes-convidado.component';

describe('RecomendacoesConvidadoComponent', () => {
  let component: RecomendacoesConvidadoComponent;
  let fixture: ComponentFixture<RecomendacoesConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [RecomendacoesConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RecomendacoesConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
