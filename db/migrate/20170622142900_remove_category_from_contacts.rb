class RemoveCategoryFromContacts < ActiveRecord::Migration[5.0]
  def change
    remove_column :contacts, :category, :string
  end
end
