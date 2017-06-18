class CreateContacts < ActiveRecord::Migration[5.0]
  def change
    create_table :contacts do |t|
      t.string :name
      t.string :corporation
      t.string :tel
      t.string :email
      t.string :category
      t.text :body

      t.timestamps
    end
  end
end
