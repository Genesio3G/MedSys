import { TestBed } from '@angular/core/testing';

import { DadospessoaisService } from './dadospessoais.service';

describe('DadospessoaisService', () => {
  let service: DadospessoaisService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DadospessoaisService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
