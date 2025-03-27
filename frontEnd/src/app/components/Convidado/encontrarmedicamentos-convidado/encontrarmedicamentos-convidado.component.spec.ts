import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EncontrarmedicamentosConvidadoComponent } from './encontrarmedicamentos-convidado.component';

describe('EncontrarmedicamentosConvidadoComponent', () => {
  let component: EncontrarmedicamentosConvidadoComponent;
  let fixture: ComponentFixture<EncontrarmedicamentosConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [EncontrarmedicamentosConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EncontrarmedicamentosConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
