import { TestBed, inject } from '@angular/core/testing';

import { RecipedetailService } from './recipedetail.service';

describe('RecipedetailService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [RecipedetailService]
    });
  });

  it('should be created', inject([RecipedetailService], (service: RecipedetailService) => {
    expect(service).toBeTruthy();
  }));
});
