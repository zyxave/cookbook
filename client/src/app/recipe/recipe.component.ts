import { Component, OnInit } from '@angular/core';

import { RecipeModel } from './recipe.model';
import { CategoryModel } from './category.model';
import { RecipeService } from './recipe.service';

@Component({
  selector: 'app-recipe',
  templateUrl: './recipe.component.html',
  styleUrls: ['./recipe.component.css']
})
export class RecipeComponent implements OnInit {

  recipes: RecipeModel[];

  searchbar: string = "";

  categories: CategoryModel[];
  catId: number = -1;

  catDisplay: string = "All";
  sortDisplay: string = "None";

  filter: string = 'all';
  sort: string = 'none';

  constructor(public rs: RecipeService) { }

  ngOnInit() {
  	this.getRecipes('all', 'none', 'none');
    this.getCategories();
  }

  getRecipes(filter: string, sort: string, search: string) {
  	this.rs.getRecipes(-1, filter, sort, search,0).subscribe(
  		data => {
  			this.recipes = data;
  		});
  }

  getCategories() {
    this.rs.getCategories().subscribe(
      data => {
        this.categories = data;
        console.log(data);
      });
  }

  changeFilter(filter:string, id: number, category: string) {
    if(filter == 'cat'){

      if(id == -1){
        this.catId = -1;
        this.catDisplay = category;
        this.filter = 'all';
      }
      else{
        this.catId = id;
        this.catDisplay = category;
        this.filter = 'id_category-' + this.catId;
      }

      this.getRecipes(this.filter, this.sort, 'none');

    }
  }

  changeSort(sort: string, display: string) {
    this.sort = sort;
    this.sortDisplay = display;

    this.getRecipes(this.filter, this.sort, 'none');
  }

  searchRecipe() {
    if(this.searchbar != ""){
      this.getRecipes('all', 'none', this.searchbar);
    }
    else{
      this.getRecipes('all', 'none', 'none');
    }
  }

  clearSearch() {
    this.searchbar = "";
    this.getRecipes('all', 'none', 'none');
  }

}
