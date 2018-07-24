class ServicesController < ApplicationController
  def index
    @articles = Article.where(published: true).limit(5).order(created_at: 'desc')
  end

  def office
  end

  def wax
  end

  def carpet
  end

  def house
  end

  def aircon
  end

  def apaman
  end
end
