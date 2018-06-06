import { Component, OnInit } from '@angular/core';


import { RecipeService } from '../recipe/recipe.service';
import { RecipeModel } from '../recipe/recipe.model';

@Component({
  selector: 'app-shoplist',
  templateUrl: './shoplist.component.html',
  styleUrls: ['./shoplist.component.css']
})
export class ShoplistComponent implements OnInit {

  recipes: RecipeModel[];

  constructor(public rs: RecipeService) { }

  ngOnInit() {
  	this.rs.getRecipes(-1, 'all', 'none', 'none',1).subscribe(
  		data => {
  			this.recipes = data;
  		});
  }

  shopDone(id:number){
  	this.rs.shopDone(id).subscribe(
  		data => {
  			this.recipes = data;
  		});
	this.rs.getRecipes(-1, 'all', 'none', 'none',1).subscribe(
	data => {
		this.recipes = data;
	});
  }

  bought(id:number,ingr:string){
  	this.rs.bought(id,ingr).subscribe();
  }
}
