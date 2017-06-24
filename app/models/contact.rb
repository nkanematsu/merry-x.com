class Contact < ApplicationRecord
  has_many :contact_categories
  has_many :categories, :through => :contact_categories

  validates :name, presence: true
  validates :corporation, presence: true
  validates :tel, presence: true
  validates :email, presence: true
  validates :body, presence: true
end
