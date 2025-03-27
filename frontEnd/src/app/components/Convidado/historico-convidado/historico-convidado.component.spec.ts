import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HistoricoConvidadoComponent } from './historico-convidado.component';

describe('HistoricoConvidadoComponent', () => {
  let component: HistoricoConvidadoComponent;
  let fixture: ComponentFixture<HistoricoConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [HistoricoConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HistoricoConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
