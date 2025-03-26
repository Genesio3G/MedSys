import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReceitaprodutoComponent } from './receitaproduto.component';

describe('ReceitaprodutoComponent', () => {
  let component: ReceitaprodutoComponent;
  let fixture: ComponentFixture<ReceitaprodutoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ReceitaprodutoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ReceitaprodutoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
