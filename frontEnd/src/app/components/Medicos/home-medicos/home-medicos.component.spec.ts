import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeMedicosComponent } from './home-medicos.component';

describe('HomeMedicosComponent', () => {
  let component: HomeMedicosComponent;
  let fixture: ComponentFixture<HomeMedicosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [HomeMedicosComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HomeMedicosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
