import { TestBed } from '@angular/core/testing';

import { MedicohospitalService } from './medicohospital.service';

describe('MedicohospitalService', () => {
  let service: MedicohospitalService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MedicohospitalService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
