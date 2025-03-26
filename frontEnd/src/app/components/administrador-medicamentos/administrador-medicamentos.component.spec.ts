import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdministradorMedicamentosComponent } from './administrador-medicamentos.component';

describe('AdministradorMedicamentosComponent', () => {
  let component: AdministradorMedicamentosComponent;
  let fixture: ComponentFixture<AdministradorMedicamentosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [AdministradorMedicamentosComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AdministradorMedicamentosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
