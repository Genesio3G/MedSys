import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MedicohospitalComponent } from './medicohospital.component';

describe('MedicohospitalComponent', () => {
  let component: MedicohospitalComponent;
  let fixture: ComponentFixture<MedicohospitalComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [MedicohospitalComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MedicohospitalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
