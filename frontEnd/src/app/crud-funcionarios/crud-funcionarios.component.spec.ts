import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudFuncionariosComponent } from './crud-funcionarios.component';

describe('CrudFuncionariosComponent', () => {
  let component: CrudFuncionariosComponent;
  let fixture: ComponentFixture<CrudFuncionariosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [CrudFuncionariosComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CrudFuncionariosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
