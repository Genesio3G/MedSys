import { TestBed } from '@angular/core/testing';

import { EspecialidadesmedicasService } from './especialidadesmedicas.service';

describe('EspecialidadesmedicasService', () => {
  let service: EspecialidadesmedicasService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EspecialidadesmedicasService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
