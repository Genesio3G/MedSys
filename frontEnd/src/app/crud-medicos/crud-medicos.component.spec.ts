import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudMedicosComponent } from './crud-medicos.component';

describe('CrudMedicosComponent', () => {
  let component: CrudMedicosComponent;
  let fixture: ComponentFixture<CrudMedicosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [CrudMedicosComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CrudMedicosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
