import { TestBed } from '@angular/core/testing';

import { StockprodutoService } from './stockproduto.service';

describe('StockprodutoService', () => {
  let service: StockprodutoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(StockprodutoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
