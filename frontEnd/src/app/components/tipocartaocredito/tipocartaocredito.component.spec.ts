import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TipocartaocreditoComponent } from './tipocartaocredito.component';

describe('TipocartaocreditoComponent', () => {
  let component: TipocartaocreditoComponent;
  let fixture: ComponentFixture<TipocartaocreditoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [TipocartaocreditoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TipocartaocreditoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
