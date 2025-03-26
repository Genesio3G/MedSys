import { TestBed } from '@angular/core/testing';

import { ReceitaprodutoService } from './receitaproduto.service';

describe('ReceitaprodutoService', () => {
  let service: ReceitaprodutoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ReceitaprodutoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
