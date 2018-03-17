class AddDisplayOrderToCategory < ActiveRecord::Migration[5.0]
  def change
    add_column :categories, :display_order, :integer, comment: "表示順", after: :name
  end
end
