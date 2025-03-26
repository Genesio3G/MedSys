import { TestBed } from '@angular/core/testing';

import { UnidadehospitalarService } from './unidadehospitalar.service';

describe('UnidadehospitalarService', () => {
  let service: UnidadehospitalarService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(UnidadehospitalarService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
