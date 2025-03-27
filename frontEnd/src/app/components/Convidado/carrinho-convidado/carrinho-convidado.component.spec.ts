import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CarrinhoConvidadoComponent } from './carrinho-convidado.component';

describe('CarrinhoConvidadoComponent', () => {
  let component: CarrinhoConvidadoComponent;
  let fixture: ComponentFixture<CarrinhoConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [CarrinhoConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CarrinhoConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
