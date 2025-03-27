import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PerfilConvidadosComponent } from './perfil-convidados.component';

describe('PerfilConvidadosComponent', () => {
  let component: PerfilConvidadosComponent;
  let fixture: ComponentFixture<PerfilConvidadosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [PerfilConvidadosComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PerfilConvidadosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
