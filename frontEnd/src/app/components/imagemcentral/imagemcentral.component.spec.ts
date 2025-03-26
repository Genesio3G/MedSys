import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ImagemcentralComponent } from './imagemcentral.component';

describe('ImagemcentralComponent', () => {
  let component: ImagemcentralComponent;
  let fixture: ComponentFixture<ImagemcentralComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ImagemcentralComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ImagemcentralComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
