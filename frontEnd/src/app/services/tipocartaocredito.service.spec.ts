import { TestBed } from '@angular/core/testing';

import { TipocartaocreditoService } from './tipocartaocredito.service';

describe('TipocartaocreditoService', () => {
  let service: TipocartaocreditoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(TipocartaocreditoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
