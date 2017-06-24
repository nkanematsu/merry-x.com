class CreateContactCategories < ActiveRecord::Migration[5.0]
  def change
    create_table :contact_categories, :options => 'ENGINE=InnoDB DEFAULT CHARSET=utf8' do |t|
      t.references :contact, foreign_key: true
      t.references :category, foreign_key: true

      t.timestamps
    end
  end
end
