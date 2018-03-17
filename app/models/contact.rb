class Contact < ApplicationRecord
  has_many :contact_categories
  has_many :categories, :through => :contact_categories

  VALID_EMAIL_REGEX = /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i
  validates :name, presence: true
  validates :email, presence: true, format: { with: VALID_EMAIL_REGEX }
  validates :body, presence: true
end
