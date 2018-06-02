import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HeaderComponent } from './header/header.component';
import { HomeComponent } from './home/home.component';
import { AppComponent } from './app.component';
import { RecipeComponent } from './recipe/recipe.component';
import { RecipedetailComponent } from './recipedetail/recipedetail.component';
import { ShoplistComponent } from './shoplist/shoplist.component';
import { NotfoundComponent } from './notfound/notfound.component';

const appRoutes = [
	{
		path: 'recipe',
		component: RecipeComponent
	},
	{
		path: 'recipedetail/:id',
		component: RecipedetailComponent
	},
	{
		path: 'shoplist',
		component: ShoplistComponent
	},
	{
		path: '',
		component: HomeComponent
	},
	{
		path: '**',
		component: NotfoundComponent
	}
];

@NgModule({
	imports:[
		RouterModule.forRoot(appRoutes, { enableTracing: true }),
	],
	exports: [
    	RouterModule
  	]
})
export class AppRoutingModule {}