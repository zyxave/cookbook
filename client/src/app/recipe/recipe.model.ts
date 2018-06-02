// interface Serializable<T> {
//     deserialize(input: Object): T;
// }

export class RecipeModel{
	constructor(
		public id: number, 
		public name: string, 
		public desc: string,
		public image: string = 'none',
		public ingredients: string[],

		public time: string = 'none', 
		public category: string = 'none',
		public tags: string[] = [],
		public bookmark: boolean = false
		) 
	{ }

	// deserialize(input){
	// 	this.id = input.id;
	// 	this.name = input.name;
	// 	this.desc = input.desc;
	// 	this.image = input.image;
	// 	this.ingredients = input.ingredients;

	// 	this.time = input.time;
	// 	this.category = input.category;
	// 	this.tags = input.tags;
	// 	this.bookmark = input.bookmark;

	// 	return this;
	// }
}