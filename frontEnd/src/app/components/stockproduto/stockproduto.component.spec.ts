import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StockprodutoComponent } from './stockproduto.component';

describe('StockprodutoComponent', () => {
  let component: StockprodutoComponent;
  let fixture: ComponentFixture<StockprodutoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [StockprodutoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StockprodutoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
