import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudHospitaisComponent } from './crud-hospitais.component';

describe('CrudHospitaisComponent', () => {
  let component: CrudHospitaisComponent;
  let fixture: ComponentFixture<CrudHospitaisComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [CrudHospitaisComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CrudHospitaisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
