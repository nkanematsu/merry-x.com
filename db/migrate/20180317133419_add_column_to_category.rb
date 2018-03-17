class AddColumnToCategory < ActiveRecord::Migration[5.0]
  def change
    add_column :categories, :deleted_at, :datetime, comment: "削除日時"
  end
end
